<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">編輯頁面</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('salaries.update', [$salary->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="modal-body">
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">日期</span>
                <input type="date" class="form-control" id="edate" name="edate" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">時數</span>
                <input class="form-control" id="ehour" name="ehour" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">時薪</span>
                <input class="form-control" id="ewage" name="ewage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="180">
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary" id="btn-save">儲存</button>
        </div>
      </form>
    </div>
  </div>
</div>
