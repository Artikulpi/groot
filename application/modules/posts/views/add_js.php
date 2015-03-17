<script type="text/javascript">

    function CategoriesCtrl($scope, $http) {
        $scope.categories = <?php echo $category ?>;
<?php if (isset($posts)): ?>
            $scope.category_data = {index: <?php echo $posts['category_id']; ?>};
<?php elseif (set_value('category_id')): ?>
            $scope.category_data = {index: <?php echo set_value('category_id'); ?>};
<?php endif; ?>

        $scope.addCategory = function() {
            var cct = $("input[name=<?php echo $this->security->get_csrf_token_name(); ?>]").val();
            $http({method: 'POST', headers: {'Content-Type': 'application/x-www-form-urlencoded'}, url: '<?php echo site_url('gadmin/posts/add_category'); ?>', data: "category_name=" + $scope.categoryText + "&<?php echo $this->security->get_csrf_token_name(); ?>=" + cct}).
                    success(function(data, status, headers, config) {
                $scope.categories.push({category_name: $scope.categoryText, category_id:data});
                $scope.categoryText = '';
                setTimeout(function() {
                    $('#selectCat').find('option:last').attr('selected', 'selected');
                }, 200);
            }).
                    error(function(data, status, headers, config) {
                // alert error
            });
        };
    }
</script>

