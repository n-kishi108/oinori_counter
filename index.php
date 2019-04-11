<?php
    
    function get_count() {
        $mysqli = new mysqli('localhost', 'root', '', 'oinori');
        $select = "SELECT `cnt` FROM `counter` WHERE `userid`='admin'";
        $result = $mysqli->query($select);
        if($result != ''){
            while($row = $result->fetch_assoc()) {
                return $row['cnt'];
            }
        }else{
            return 'aho';
        }
    };

    $count = get_count();
?>
<html>
<head>
<title>お祈りカウンタ</title>
<link rel="stylesheet" href="index.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <main>
        <h1 id="title">お祈りカウンター</h1>
        <h2 id="my-cnt"><?= $count ?></h2>
        <button id="add" onclick="countup()">お祈りされた</button>
    </main>
    <script>
        $(window).on('load', function() {
            $('#add').addClass('transition02s');
        });

        function countup() {
            $.ajaxSetup({
		        type: 'POST',
		        url: 'http://192.168.64.2/oinori/addCnt.php',
		        async: false,
	        });

	        let send = {
                'cnt': $('#my-cnt').text()
                };

	        let result = $.ajax({ data: $.param(send) }).responseText;
            console.log('result: ' + result);

	        $('#my-cnt').text(result);
        }
    </script>
</body>
</html>