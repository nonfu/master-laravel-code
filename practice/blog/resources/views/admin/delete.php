<!-- Logout Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">确定要删除?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">点击下面的 "删除" 按钮删除选定内容</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                <button class="btn btn-primary" type="submit" id="deleteItemBtn">删除</button>
                <form action="/admin/<?=$itemType?>/delete" method="post" id="deleteItemForm">
                    <input type="hidden" name="id" value="" id="deleteItemId">
                </form>
            </div>
        </div>
    </div>
</div>
