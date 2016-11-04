$(function() {
	var todayDate = moment().startOf('day');
	var YM = todayDate.format('YYYY-MM');
    $('#calendar').fullCalendar({
    	dayClick: function() {
    		var d = new Date();
    		var todayDate = moment().startOf('day');
    		var YM = todayDate.format('YYYY-MM');
			var month = d.getMonth()+1;
			var day = d.getDate();
			var output = d.getFullYear() + '-' +
			    ((''+month).length<2 ? '0' : '') + month + '-' +
			    ((''+day).length<2 ? '0' : '') + day;

		    var currentDate = $(this).attr('data-date');
    		if($(this).attr('data-date') < output){
    			alert("You can't create an event in the past!");
    		}else{
    			$('.modal').modal('show');
    			$('#save_btn').click(function(){
    				var start_time = $('#start_time').val();
    				var end_time = $('#end_time').val();
    				if(end_time < start_time){
    					alert('End time has to be after start time');
    					return;
    				}
    				data = {
						title: $('#event_title').val(),
						start: currentDate  + " " + $('#start_time').val(),
						end:  currentDate + " " + $('#end_time').val()
					};
					createEvent(data);
    			});
    		}
	    },
	    eventDrop: function(event){
	    	console.log(event);
	    	data = {
				title: event.title,
				start: event.start,
				end:  event.end
			};
	    },
	    editable: true,
	    selectHelper: true,
	    selectable: true,
	    events: function(){
	    	var url = $('#url').val() + 'retrieveevents';
	    	$.ajax({
				type: "POST",
				url: url,
				success: function (msg){
					alert(msg);
					if(msg.length > 0){
						var events = [];
					}
					
				},
				fail: function(msg){
					alert(msg);
				}

			});
	    }
    });
    
});

function createEvent(eventData)
{
	$('#calendar').fullCalendar( 'renderEvent', eventData );
	var url = $('#url').val() + 'createevent';
	$.ajax({
		type: "POST",
		data: eventData,
		url: url,
		success: function (msg){
			alert(msg);
		},
		fail: function(msg){
			alert(msg);
		}

	});
	$('.modal').modal('hide');
}

function updateEvent(eventData)
{
	var url = $('#url').val() + 'updateevent';
	$.ajax({
		type: "POST",
		data: eventData,
		url: url,
		success: function (msg){
			alert(msg);
		},
		fail: function(msg){
			alert(msg);
		}

	});
}