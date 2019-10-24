<form action="{{ route('updateStatus') }}" method="post">
    <input type="hidden" name="id" value="{{ $applicationStatus->id }}">
    @csrf
    <div class="my_profile_form_area">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="my_profile_select_box form-group">
                    <label>Status<span class="required"> *</span></label><br>
                    <select class="form-control" name="status" required>
                        <option value="">Select Status</option>
                        <option value="APPLIED"{{ $applicationStatus->status == 'APPLIED' ? ' selected' : ''}}>Applied</option>
                        <option value="PROCESSING"{{ $applicationStatus->status == 'PROCESSING' ? ' selected' : ''}}>Processing</option>
                        <option value="APPROVED"{{ $applicationStatus->status == 'APPROVED' ? ' selected' : ''}}>Approved</option>
                        <option value="DECLINED"{{ $applicationStatus->status == 'DECLINED' ? ' selected' : ''}}>Declined</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <div class="my_profile_input" style="margin-top: 10px;">
                    <button class="btn btn-lg btn-thm">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>