<script src="/js/admin.js"></script>
<?php
if (!empty($jsStacks)):
    foreach ($jsStacks as $jsStack):
?>
        <script src="<?=$jsStack?>"></script>
<?php
    endforeach;
endif;
?>

</body>

</html>
