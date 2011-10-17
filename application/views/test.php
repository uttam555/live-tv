<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>
<body>
    <?php
    // put your code here
    ?>
    <ul>
        <li onclick="add_val('1')" type="disc" class="1" >sdlkfjlsd</li>
        <li onclick="add_val('2')" class="2">sdlkfjlsd</li>
    </ul>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
arr = new Array();
function add_val(val){
    //arr.push(val);
    //$(this).toggleClass('test');
    //alert($(this).attr('type'));
    var boolVal;
    $('.'+val).toggleClass('test');
}
</script>
</html>
