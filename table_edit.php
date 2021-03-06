<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Table</title>
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            // check the input
            is_numeric($_GET['id']) or die("invalid URL");
            
            require_once '_db.php';
            
            $stmt = $db->prepare('SELECT * FROM tables WHERE id = :id');
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
            $table1 = $stmt->fetch();
        ?>
        <form id="f" style="padding:20px;">
            <input type="hidden" name="id" value="<?php print $_GET['id'] ?>" />
            <h1>Edit Table</h1>
            
            <div class="space">
                <div>Name: </div>
                <div><input type="text" id="name" name="name" value="<?php print $table1['name'] ?>" /></div>
            </div>
            
            <div class="space">
                <div>Capacity:</div>
                <div>
                    <select id="capacity" name="capacity">
                        <?php 
                            $options = array(2, 4, 6);
                            foreach ($options as $option) {
                                $selected = $option == $table1['capacity'] ? ' selected="selected"' : '';
                                $id = $option;
                                $name = $option;
                                print "<option value='$id' $selected>$name</option>";
                            }
                        ?>
                    </select>                
                </div>
            </div>
            
            <div class="space">
                <div>Status:</div>
                <div>
                    <select id="status" name="status">
                        <?php 
                            $options = array("vacant", "Cleanup", "Booked");
                            foreach ($options as $option) {
                                $selected = $option == $table1['status'] ? ' selected="selected"' : '';
                                $id = $option;
                                $name = $option;
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
            DayPilot.Modal.close(result);
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post("backend_room_update.php", f.serialize(), function (result) {
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
