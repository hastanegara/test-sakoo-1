<html>
<head>
    <style type="text/css">
        #circle {
            position: fixed;
            left: 100px;
            top: 100px;
            height: 300px;
            width: 300px;
            border-radius: 50%;
            border: 4px solid red;
        }

        .item {
            width: 37px;
            height: 30px;
            border-radius: 50%;
            position: absolute;
            background-color: rgb(209, 228, 232);
            color: #0069d9;
            padding-left: 3px;
            padding-top: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }
    </style>

    <script type="text/javascript">
        var rotation = 0;
        var radius = 300 / 2;
        var itemRadius = 40 / 2;
        var spacing  = {{ $sudut }};

        window.onload = function() {
            @foreach($array as $key=>$value)
                var item = document.createElement('div');
                item.id = 'item'+{{ $key }};
                item.className = 'item';
                var l = Math.cos(rotation * Math.PI / 180) * radius - itemRadius;
                var t = Math.sin(rotation * Math.PI / 180) * radius - itemRadius;
                item.setAttribute('style', 'left:'+(l+radius)+'px;top:'+(t+radius)+'px');
                rotation += spacing;
                document.getElementById('circle').appendChild(item);
                document.getElementById('item'+{{ $key }}).innerHTML = {{ $value }};
            @endforeach
        }
    </script>
</head>

<body>
    <div id="circle">
    </div>
</body>
</html>