$('.add-movie .row.ml-4 .col-md-6').css('display', 'none');

$('a.btn.btn-danger.btn-action').addClass('disabled')

imdbArray = [
	'Title',
	'Year',
	'Rated',
	'Released',
	'Runtime',
	'Genre',
	'Director',
	'Writer',
	'Actors',
	'Plot',
	'Language',
	'Country',
	'Awards',
	'Poster',
	'imdbRating',
	'imdbVotes',
	'imdbID',
	'Type',
	'Production'
];

$('#fetchImdb').click(function() {
	$('#overlay').show()
	imdbId = $('input[name="imdbID"]').val();
	type=$('input[name="type"]').val();

	$.ajax({
		url      : 'ajax/fetch_imdb.php',
		data     : { imdbID: imdbId,type:type },
		success  : function(data) {
			//return ;
			imdbData = JSON.parse(data);
			// return false;
		},
		complete : function() {
			$.each(imdbArray, function() {
				$('input[name="' + this + '"]').val(imdbData[this]);
				console.log(imdbData[this]);
				console.log('input[name="' + this + '"]');
			});
			$('textarea[name="Plot"]').val(imdbData.Plot);
			$('input[name="Poster"]').val(imdbData.Poster);
			$('input[name="totalSeasons"]').val(imdbData.Poster);

			//$('.row.ml-4 .col-md-6 input').val('');
			$('#overlay').hide()
			$('.row.ml-4 .col-md-6').hide();
			$('.row.ml-4 .col-md-6').show('slow');
		}
	});
});

$('#uniqueId').click(function() {
	$('.row.ml-4 .col-md-6 input').val('');
	$('textarea[name="Plot"]').val('');
	$('input[name="Poster"]').val('');

	$('input[name="imdbID"]').val(Math.floor(Math.random() * 1000000000));
	$('.row.ml-4 .col-md-6').hide();
	$('.row.ml-4 .col-md-6').show('slow');
});

$('input[name="episodes-count"]').keyup(function(){
	epCount=$(this).val();
	colStr_1=colStr_2=colStr_3=''
 for(i=1;i<=epCount;i++)
 {
	colStr_1+=`<div class="col-12 ">
	<div class="form-group row">
	  <label for="inputEmail3" class="col-sm-2 col-form-label ">720p Video (.mp4): Episode ${i}</label>
	  <div class="col-sm-8">
		<form id="upload720${i}" class="fileupload" method="post" action="fileuploader/upload.php" enctype="multipart/form-data">
		  <div id="drop">
			Drop Here
   
			<a>Browse</a>
			<input type="hidden" value="720p" name="quality">
			<input type="hidden" value="${i}" name="episode">
			<input type="file" name="upl" multiple="">
		  </div>
   
		  <ul>
			<!-- The file uploads will be shown here -->
		  </ul>
   
   
		</form>
   
   
	  </div>
	</div>
   </div>`;

   colStr_2+=`<div class="col-12 ">
   <div class="form-group row">
	 <label for="inputEmail3" class="col-sm-2 col-form-label ">1080p Video (.mp4) :Episode ${i}</label>
	 <div class="col-sm-8">
	   <form id="upload1080${i}" class="fileupload" method="post" action="fileuploader/upload.php"
		 enctype="multipart/form-data">
		 <div id="drop">
		   Drop Here OR

		   <a>Browse</a>
		   <input type="hidden" value="1080p" name="quality" />
		   <input type="hidden" value="${i}" name="episode">
		   <input type="file" name="upl" multiple />
		 </div>

		 <ul>
		   <!-- The file uploads will be shown here -->
		 </ul>


	   </form>



	 </div>
   </div>
 </div>`;

 colStr_3+=` <div class="col-12 ">
 <div class="form-group row">
   <label for="inputEmail3" class="col-sm-2 col-form-label ">English Subtitles(only .vtt) :Episode ${i}</label>
   <div class="col-sm-8">
	 <form id="uploadsub${i}" class="fileupload" method="post" action="fileuploader/upload.php"
	   enctype="multipart/form-data">
	   <div id="drop">
		 Drop Here OR

		 <a>Browse</a>
		 <input type="hidden" value="english" name="subtitle" />
		 <input type="file" name="upl" multiple />
		 <input type="hidden" value="${i}" name="episode">
	   </div>

	   <ul>
		 <!-- The file uploads will be shown here -->
	   </ul>


	 </form>



   </div>
 </div>
</div>`
 }

 $('input[name="list_episode"]').val(epCount)

 $('#uploader .card-body').html(colStr_1+colStr_2+colStr_3)

 $('.fileupload').each(function() {

	//	console.log($(this));
		currId = $(this).attr('id');

		var ul = $('#' + currId + ' ul');

		$('#' + currId + ' #drop a').click(function() {
			// Simulate a click on the file input button
			// to show the file browser dialog
			$(this).parent().find(' input').click();
		});
		event.preventDefault()
		$(this).fileupload({
			dropZone : $(this),

			// This function is called when a file is added to the queue;
			// either via the browse button, or via drag/drop:
			add      : function(e, data) {
				var tpl = $(
					'<li class="working"><input type="text" value="0" data-width="48" data-height="48"' +
						' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>'
				);

				// Append the file name and file size
				tpl.find('p').text(data.files[0].name).append('<i>' + formatFileSize(data.files[0].size) + '</i>');

				// Add the HTML to the UL element
				data.context = tpl.appendTo(ul);

				// Initialize the knob plugin
				tpl.find(' input').knob();

				// Listen for clicks on the cancel icon
				tpl.find(' span').click(function() {
					if (tpl.hasClass('working')) {
						jqXHR.abort();
					}

					tpl.fadeOut(function() {
						tpl.remove();
					});
				});

				// Automatically upload the file once it is added to the queue
			var jqXHR = data.submit();
				
			},

		


			progress : function(e, data) {
				// Calculate the completion percentage of the upload
				var progress = parseInt(data.loaded / data.total * 100, 10);

				// Update the hidden input field and trigger a change
				// so that the jQuery knob plugin knows to update the dial
				data.context.find(' input').val(progress).change();

				if (progress == 100) {
					data.context.removeClass('working');
				}
			},

			fail     : function(e, data) {
				// Something has gone wrong!
				data.context.addClass('error');
			},
			
		});
	});

	// Prevent the default action when a file is dropped on the window
	$(document).on('drop dragover', function(e) {
		e.preventDefault();
	});
	$(document).on('submit', function(e) {
		e.preventDefault();
	});

	// Helper function that formats the file sizes
	function formatFileSize(bytes) {
		if (typeof bytes !== 'number') {
			return '';
		}

		if (bytes >= 1000000000) {
			return (bytes / 1000000000).toFixed(2) + ' GB';
		}

		if (bytes >= 1000000) {
			return (bytes / 1000000).toFixed(2) + ' MB';
		}

		return (bytes / 1000).toFixed(2) + ' KB';
	}


});
