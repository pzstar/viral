<?php
/**
 * @package Viral
 */

$disable_section = get_theme_mod('viral_pro_frontpage_video_sec_disable', 'off');

if( $disable_section == 'on' ){
return;
}

$viral_pro_frontpage_video_blocks = get_theme_mod('viral_pro_frontpage_video_blocks');

$videos = array();

if($viral_pro_frontpage_video_blocks){
	$viral_pro_frontpage_video_blocks = json_decode($viral_pro_frontpage_video_blocks);
	foreach ($viral_pro_frontpage_video_blocks as $viral_pro_frontpage_video_block) {
		if($viral_pro_frontpage_video_block->enable == 'on' ){
			$videos[] = $viral_pro_frontpage_video_block->id;
		}
	}
}

$new_videos = $videos;

array_shift($new_videos);

$video_list = implode(', ', $new_videos);
?>

<div id="et-video-playlist">

	<div class="et-video-holder clearfix"> 
		<div class="big-video">
            <div class="big-video-inner">
	           <div id="et-video-placeholder"></div>
            </div>
		</div>

		<div class="video-thumbs">
			<div class="video-controls">
				
				<div class="video-track">
					<div class="video-current-playlist">
						<?php _e('Fetching Video Title..', 'viral-pro') ?>
					</div>

					<div class="video-duration-time">
						<span class="video-current-time">0:00</span>
						/
						<span class="video-duration"><?php esc_html_e('Loading..', 'viral-pro') ?></span>		
					</div>
				</div>

				<div class="video-control-holder">
					<div class="video-play-pause stopped"><i class="fa fa-play" aria-hidden="true"></i></div>
					<div class="video-prev"><i class="fa fa-step-backward" aria-hidden="true"></i></div>
					<div class="video-next"><i class="fa fa-step-forward" aria-hidden="true"></i></div>
				</div>

			</div>

			<div class="et-video-thumbnails">
				<?php 
					$video_title = $video_thumb_url = $video_duration = "";
					$i = 0;
					foreach ($videos as $video) {
						
						$video_api = wp_remote_get( 'https://www.googleapis.com/youtube/v3/videos?id='. $video .'&key=AIzaSyDaUgJGg1sVfLcBFwXE-9uHrNo6YABIRjk&part=snippet,contentDetails', array('sslverify' => false ) );

						$video_api_array = json_decode(wp_remote_retrieve_body( $video_api ), true);

						//var_dump($video_api_array);
						if(is_array($video_api_array) && !empty($video_api_array['items']) ){
							$snippet = $video_api_array['items'][0]['snippet'];
							$video_title = $snippet['title'];
							$video_thumb_url = $snippet['thumbnails']['default']['url'];
							$video_duration = $video_api_array['items'][0]['contentDetails']['duration'];
    						?>
    						<div class="et-video-list vl-clearfix" data-index="<?php echo $i; ?>" data-video-id="<?php echo $video; ?>"> 
    							<img alt="<?php echo esc_attr($video_title); ?>" src="https://img.youtube.com/vi/<?php echo esc_attr($video); ?>/default.jpg">
    							
    							<div class="video-title-duration">
    								<h6><?php echo esc_html($video_title); ?></h6>
    								<div class="video-list-duration"><?php echo et_youtube_duration($video_duration) ?></div>
    							</div>
    						</div>
 						<?php
                        }
					$i++;	
					}
				?>
			</div>
		</div>
	</div>
</div>
<?php 
wp_enqueue_script( 'youtube-api');
?>
<script type="text/javascript">
	
	var player;
	var time_update_interval;

	function onYouTubeIframeAPIReady() {
	    player = new YT.Player( 'et-video-placeholder', {
	        //width: 800,
	        //height: 450,
	        videoId: '<?php echo $videos[0] ?>',
	        playerVars: {
	            color: 'white',
	            playlist: '<?php echo $video_list ?>',
	        },
	        events: {
	            onReady: initialize,
	            onStateChange: onPlayerStateChange
	        }
	    });
        
	}

	function initialize(){

	    // Update the controls on load
	    updateTimerDisplay();

	    jQuery('.video-current-playlist').text(jQuery('.et-video-list:first').text());
	    jQuery('.et-video-list:first').addClass('video-active')

	    // Clear any old interval.
	    clearInterval(time_update_interval);

	    // Start interval to update elapsed time display and
	    // the elapsed part of the progress bar every second.
	    time_update_interval = setInterval(function () {
	        updateTimerDisplay();
	    }, 1000);

	}

	// This function is called by initialize()
	function updateTimerDisplay(){
	    // Update current time text display.
	    jQuery('.video-current-time').text(formatTime( player.getCurrentTime() ));
	    jQuery('.video-duration').text(formatTime( player.getDuration() ));
	}

	function formatTime(time){
	    time = Math.round(time);
	    var minutes = Math.floor(time / 60),
	    seconds = time - minutes * 60;
	    seconds = seconds < 10 ? '0' + seconds : seconds;
	    return minutes + ":" + seconds;
	}

	function onPlayerStateChange(event) {
	    updateButtonStatus(event.data);
	  }

	function updateButtonStatus(playerStatus) {
		//console.log(playerStatus);
	    if (playerStatus == -1) {
	    	jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // unstarted
	    	var currentIndex = player.getPlaylistIndex();

	    	var currentElement = jQuery('.et-video-list').map(function(){
	    		if(currentIndex == jQuery(this).attr('data-index')){
	    			return this;
	    		}
	    	});

		    var videoTitle = currentElement.find('h6').text();

		    currentElement.siblings().removeClass('video-active');
		    currentElement.addClass('video-active');

		    jQuery('.video-current-playlist').text(videoTitle);

		    player.setLoop(true);

	    } else if (playerStatus == 0) {
	     	jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // ended
	    } else if (playerStatus == 1) {
	     	jQuery('.video-play-pause').removeClass('stopped').addClass('playing'); // playing
	    } else if (playerStatus == 2) {
	      	jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // paused
	    } else if (playerStatus == 3) {
	      	jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // buffering
	    } else if (playerStatus == 5) {
	      	// video cued
	    }
	 }

	jQuery(function($){

		$('body').on('click', '.video-play-pause.stopped', function () {
		    player.playVideo();
		    $(this).removeClass('stopped').addClass('playing');
		});

		$('body').on('click', '.video-play-pause.playing', function () {
		    player.pauseVideo();
		    $(this).removeClass('playing').addClass('stopped');
		});

		$('.video-next').on('click', function () {
		    player.nextVideo();
		});

		$('.video-prev').on('click', function () {
		    player.previousVideo()
		});

		$('.et-video-list').on('click', function () {
		    var videoIndex = $(this).attr('data-index');
			//videoIndex = parseInt(videoIndex) - 1;
		    player.playVideoAt(videoIndex);
		    player.setLoop(true);
		});

	});

</script>