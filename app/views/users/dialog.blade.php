<div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="user-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="user-modal-label">
                    Edit user
                    <small class="loading collapse">
                        <i class="fa fa-spinner fa-spin"></i>
                        Loading
                    </small>
                </h4>
            </div>
            <form class="form-horizontal" id="user-form" role="form">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="userid" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="userid" id="userid" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="passwd" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password"><small>Leave blank to not change</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="homedir" class="col-sm-2 control-label">Home dir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="homedir" id="homedir" placeholder="Home directory">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="shell" class="col-sm-2 control-label">Shell</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="shell" id="shell" placeholder="Shell">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gid" class="col-sm-2 control-label">Group</label>
                        <div class="col-sm-10">
                            <select id="gid" name="gid" class="form-control">
                                @foreach($groups as $group)
                                <option value="{{ $group->gid }}">{{ $group->groupname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Save changes
                        <span class="saving collapse">
                            <i class="fa fa-spinner fa-spin"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>