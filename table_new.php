<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Table</title>
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            // check the input
            //is_numeric($_GET['id']) or die("invalid URL");
            
            require_once '_db.php';
            
            $tables = $db->query('SELECT * FROM tables');
        ?>
        <form id="f" style="padding:20px;">
            <h1>New Table</h1>
            
            <div class="space">
                <div>Name: </div>
                <div><input type="text" id="name" name="name" value="" /></div>
            </div>
            
            <div class="space">
                <div>Capacity:</div>
                <div>
                    <select id="capacity" name="capacity">
                        <option value='2'>2</option>
                        <option value='4'>4</option>
                        <option value='6'>6</option>
                    </select>
                </div>
            </div>
            
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">Cancel</a></div>
        </form>
        
        <script type="text/javascript">
        function close(result) {
            DayPilot.Modal.close(result);
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post("backend_room_create.php", f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });

        $(document).ready(function () {
            $("#name").focus();
        });
    
        </script>
    </body>
</html>
