<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Reservation</title>
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            // check the input
            //is_numeric($_GET['id']) or die("invalid URL");
            
            require_once '_db.php';
            
            $tables = $db->query('SELECT * FROM tables');
            
            $start = $_GET['start']; // TODO parse and format
            $end = $_GET['end']; // TODO parse and format
        ?>
        <form id="f" action="backend_create.php" style="padding:20px;">
            
            
            <h1>New Reservation</h1>
            
            <div class="space">
                <div>Name: </div>
                <div><input type="text" id="name" name="name" value="" /></div>
            </div>
            
            <div class="space">
                <div>Start:</div>
                <div><input type="text" id="start" name="start" value="<?php echo $start ?>" /></div>
            </div>
            
            <div class="space">
                <div>End:</div>
                <div><input type="text" id="end" name="end" value="<?php echo $end ?>" /></div>
            </div>
            
            <div class="space">
                <div>Table</div>
                <div>
                    <select id="table1" name="table1">
                        <?php 
                            foreach ($tables as $table1) {
                                $selected = $_GET['resource'] == $table1['id'] ? ' selected="selected"' : '';
                                $id = $table1['id'];
                                $name = $table1['name'];
                                print "<option value='$id' $selected>$name</option>";
                            }
                        ?>
                    </select>

                </div>
            </div>
            
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">Cancel</a></div>
        </form>
        
        <script type="text/javascript">
        function close(result) {
            if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                parent.DayPilot.ModalStatic.close(result);
            }
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
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
