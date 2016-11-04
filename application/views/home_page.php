<?php include_once("header.html"); ?>
	<div id="calendar"></div>
	<div class="modal fade">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
					<h4 class="modal-title">Create Event</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="control-label">
								Title
							</label>
							<input name="event_title" id="event_title" class="form-control" type="text" autofocus/>
						</div>
						<div class="form-group">
							<label class="control-label">
								Start Time
							</label>
							<input name="start_time" id="start_time" class="form-control" type="time" />
						</div>
						<div class="form-group">
							<label class="control-label">
								End Time
							</label>
							<input name="end_time" id="end_time" class="form-control" type="time" />
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="save_btn">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<?php include_once("footer.html"); ?>