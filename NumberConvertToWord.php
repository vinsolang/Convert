<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Numbers to Words Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    .container{
        width: 35%;
        height: auto;
        background: lightcyan;
        margin-top: 10%;
        
        
    }
</style>
<body>
    <div class="container">
        <h2>Numbers to Words Calculator</h2>
        <form method="POST">
            <label class="from-control">Enter a number:</label>
            <input type="number" name="number" required  class="from-control">
            <button type="submit" class="btn-success">Convert</button>
        </form>

    </div>
    <?php
    function convertNumberToWords($number) {
        $words = [
            0 => 'Zero', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four',
            5 => 'Five', 6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen',
            15 => 'Fifteen', 16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen',
            20 => 'Twenty', 30 => 'Thirty', 40 => 'Forty', 50 => 'Fifty',
            60 => 'Sixty', 70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety',
        ];

        if ($number < 21) return $words[$number];
        if ($number < 100) return $words[floor($number / 10) * 10] . ($number % 10 != 0 ? ' ' . $words[$number % 10] : '');
        if ($number < 1000) return $words[floor($number / 100)] . ' Hundred' . ($number % 100 != 0 ? ' ' . convertNumberToWords($number % 100) : '');
        if ($number < 10000) return $words[floor($number / 1000)] . ' Thousand' . ($number % 1000 != 0 ? ' ' . convertNumberToWords($number % 1000) : '');

        return 'Number too large';
    }

    function convertToKhmerWords($number) {
        $khmerWords = [
            1000 => "ពាន់",
            2000 => "ពីរពាន់",
            3000 => "បីពាន់",
            4000 => "បួនពាន់",
            5000 => "ប្រាំពាន់",
            6000 => "ប្រាំមួយពាន់",
            7000 => "ប្រាំពីរពាន់",
            8000 => "ប្រាំបីពាន់",
            9000 => "ប្រាំបួនពាន់"
        ];

        return isset($khmerWords[$number]) ? $khmerWords[$number] . " រៀល" : "មិនស្គាល់ចំនួននេះ";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = intval($_POST["number"]);
        $usd = number_format($num / 4000, 2);

        echo "
           <div class='container'>
                <h3>Result:</h3>
                Please input your data: <strong>$num</strong><br>
                a. " . convertNumberToWords($num) . " Riel<br>
                b. " . convertToKhmerWords($num) . "<br>
                c. $$usd
           </div>
        ";
    }
    ?>
</body>
</html>
