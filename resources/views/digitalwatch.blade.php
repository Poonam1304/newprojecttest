<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Clock</title>
    <style>
        body {
            text-align: center;
        }
        .clock {
            background-color: #000;
            color: #fff;
            position: absolute;
            padding: 10px 20px;
            font-size: 40px;
            border-radius: 5px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>jQuery Digital Clock</h1>

    <div class="clock" id="clock"> </div> 
    

    <script type="text/javascript">
        function showTime() {
            var date = new Date();
            var h = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();
            var session = "AM";

            if ( h == 0 ) {
                h = 12;
            }

            if ( h >= 12 ) {
                session = "PM";
            }

            if ( h > 12 ) {
                h = h - 12;
            }

            m = ( m < 10 ) ? "0" + m : m;
            s = ( s < 10 ) ? "0" + s : s;

            var time = h + ":" + m + ":" + s + " " + session;
            $('#clock').html(time);

            setTimeout(showTime, 1000);
        }

        $(document).ready(function() {
            showTime(); 
        });
    </script>
</body>
</html>