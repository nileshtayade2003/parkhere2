<?php
session_start();
extract($_POST);
$user = $_SESSION['user'];

//recieving the data

$name=$user['name'];
$email=$user['email'];
$mobile=$user['phone'];
$amount=$parking_cost;

// Include Requests only if not already defined
if (class_exists('Requests') === false)
{
    require_once __DIR__.'/libs/Requests-1.8.0/library/Requests.php';
}

try
{
    Requests::register_autoloader();

    if (version_compare(Requests::VERSION, '1.6.0') === -1)
    {
        throw new Exception('Requests class found but did not match');
    }
}
catch (\Exception $e)
{
    throw new Exception('Requests class found but did not match');
}

spl_autoload_register(function ($class)
{
    // project-specific namespace prefix
    $prefix = 'Razorpay\Api';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0)
    {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    //
    // replace the namespace prefix with the base directory,
    // replace namespace separators with directory separators
    // in the relative class name, append with .php
    //
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file))
    {
        require $file;
    }
});



use Razorpay\Api\Api;
$keyId = 'rzp_test_BGYCRg4LW1EMUL';
$secretKey = 'FyQN36PJtCmxdHGUVLpD6MHA';


$api=new Api($keyId,$secretKey);

$order=$api->order->create(array(
    'amount'=>$amount*100,
    'payment_capture'=>1,
    'currency'=>'INR',
));


?>

<style>
.razorpay-payment-button{
    display: none;
}
</style>

<!-- redirecting to bookings-save.php  -->
<form action="../../user/bookings-save.php" method="post">

    <!-- transfer booking data to save into bookings -->
    <input type="hidden" name='parking_date' value="<?php echo $parking_date; ?>">
    <input type="hidden" name='start_time' value="<?php echo $start_time; ?>">
    <input type="hidden" name='end_time' value="<?php echo $end_time; ?>">
    <input type="hidden" name='slot_id' value="<?php echo $slot_id; ?>">
    <input type="hidden" name='parking_cost' value="<?php echo $parking_cost; ?>">
    <input type="hidden" name='payment_mode' value="<?php echo $payment_mode; ?>">

    <script src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId ;?>"
    data-amount="<?php echo $order->amount;?>"
    data-currency="INR"
    data-buttontext="Pay"
    data-name="Park Here"
    data-description="Book your parking at your peace."
    data-image=""
    data-prefill.name="<?php echo $name;?>"
    data-prefill.email="<?php echo $email;?>"
    data-prefill.contact="<?php echo $mobile;?>"
    data-theme.color="#black"
    ></script>
</form>


<script>document.querySelector(".razorpay-payment-button").click()</script>
