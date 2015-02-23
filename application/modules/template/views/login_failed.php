<div class="notifikasi-error">
    <script>
        $(function() {
            runEffect();
            return false;
        });
        // run the currently selected effect
        function runEffect() {
            // get effect type from
            var selectedEffect = $("#effectTypes").val();

            // most effect types need no options passed by default
            var options = {};
            // some effects have required parameters
            if (selectedEffect === "scale") {
                options = {percent: 100};
            } else if (selectedEffect === "size") {
                options = {to: {,}};
            }

            // run the effect
            $("#error").show(selectedEffect, options, 200, callback);
        }
        ;

        //callback function to bring a hidden box back
        function callback() {
            setTimeout(function() {
                $("#error:visible").removeAttr("style").fadeOut();
            }, 200);
        }
        ;

        $("#error").hide();
    </script>

    <div class="toggler">
        <div id="error" class="down">
            <div class="left"></div>
            <div style="font-weight: bold; margin-top: 10px;padding-left: 3px;">
                <?php echo isset($message) ? $message : null; ?>
            </div>
        </div>
    </div>
    <input type="hidden" name="effects" value="blind" id="effectTypes">
</div>