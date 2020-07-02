<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?=$siteName;?> 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include 'logout.php';?>

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
