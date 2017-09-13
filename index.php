<?php
    // 当前这个php文件的作用，就是接收到用户要请求的内容参数
    // 将用户想要访问的内容，找到之后，返回给用户

    // 用户当前访问网页的形式为  http://studyit.com/views/dashboard/index.html
    // 我们想让用户访问的网页的连接编程 http://studyit.com/index.php/文件夹名称/文件名


    //在php当中有个对象， $_SERVER

    //$_SERVER中有个属性叫做PATH_INFO，可以用来获取用户传入的路径信息

    //在当前项目中，我们可以利用它来获取用户想要访问的  /文件夹名称/文件名  这部分内容



    // 为$path设置一个默认值
    $path = "/dashboard/index";

    //判断用户是否传递了路径
    if(array_key_exists("PATH_INFO", $_SERVER)){
        $path = $_SERVER["PATH_INFO"];
    }
    
    $path = substr($path, 1, strlen($path));
    $path = explode("/", $path);

    // var_dump($path);

    //这是用户要请求的文件夹名称
    $directoryName = $path[0];
    //这是用户要请求的文件名
    $filename = $path[1];

    $realPath = "views/".$directoryName."/".$filename.".html";

    //判断如果用户请求的文件存在
    if(file_exists($realPath)){
        //通过php代码，找到用户要请求的文件，给用户返回即可
        include $realPath;
    }else{
        header("HTTP/1.1 404 NotFound");
        echo "<img src='https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1504932103322&di=610ecc775692665290e952b32f6fe594&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fimage%2Fc0%253Dshijue1%252C0%252C0%252C294%252C40%2Fsign%3Df81faa0867224f4a43947b50619efa27%2F21a4462309f79052d2c69b1006f3d7ca7acbd5c7.jpg'>";
    }

    
?>