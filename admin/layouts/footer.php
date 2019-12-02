 </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/shop/public/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/shop/public/admin/js/bootstrap.min.js"></script>
    <script src="/shop/public/admin/js/javascrip.js"></script>

    <!-- Morris Charts JavaScript -->
    <script>
    function checkall(clasname,obj){
        var check = document.getElementsByClassName(clasname);
        if (obj.checked == true) {
              for (var i = 0; i < check.length; i++) {
                        check[i].checked = true;
                    }
        }else{
            for (var i = 0; i < check.length; i++) {
                        check[i].checked = false;
                    }
        }
    }

</script>

</body>

</html>
