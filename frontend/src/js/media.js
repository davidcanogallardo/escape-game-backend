var getusermedia = window.getUserMedia

var devices = undefined;
var micStarted = false;
var audio = document.createElement('audio');
var video = document.createElement('video');

var mediaDevicesPromise = navigator.mediaDevices.getUserMedia({
	audio: true,
	video: false,
});

mediaDevicesPromise
	.then(function () {
		var enumeratorPromise = navigator.mediaDevices
			.enumerateDevices()
			.then(function (_devices) {
				devices = _devices;
				var camArray = [];
				var micArray = [];
				_devices.forEach(function (device) {
					if (device.kind == "videoinput") {
						var cam = {
							label: device.label,
							id: device.deviceId
						}
<<<<<<< HEAD
=======
						// var option = document.createElement("option");
						// option.innerHTML = device.label;
						// option.value = device.deviceId;

						
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
						camArray.push(cam)
					} else if (device.kind == "audioinput") {
						var mic = {
							label: device.label,
							id: device.deviceId
						}
<<<<<<< HEAD
=======
						// var option = document.createElement("option");
						// option.innerHTML = device.label;
						// option.value = device.deviceId;

						
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
						micArray.push(mic)
					}
					window.mic = micArray
					window.cam = camArray
				});
			})
			.catch(function (err) {
				console.log(err.name + ":" + err.message);
			});
	})
	.catch(function () {
		console.log("Error with navigator.mediaDevices Promise");
	});

<<<<<<< HEAD
function startTestMic() {
	micButton = document.getElementById("micTest");
	if (micStarted) {
		console.log("turining OFF mic");
		micButton.innerHTML = "TEST MICROPHONE";
=======
/**
 * Library to wrap navigator.getUserMedia and handle errors for all the diferent kind of browsers.
 */

function testMic() {
	micButton = document.getElementById("micTest");
	if (webcamStarted) {
		console.log("turining OFF webcam");
		micButton.innerHTML = "TEST MICROPHONE";
		//document.getElementById("video").removeChild(video);
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
		if (audio) {
			window.stream.getAudioTracks().forEach(track => track.stop());
			window.stream = null;
			audio.pause();
			audio.currentTime = 0;
			audio.srcObject = null;
		}
	} else {
		audio = document.createElement('audio');
		console.log("turning ON mic");
		micButton.innerHTML = "STOP TEST";
<<<<<<< HEAD
		audio.controls = true;
		audio.autoplay = true;
		audio.srcObject = window.stream;
		video.srcObject = window.stream;

=======
		stream = startMedia();
		console.log("hola");
		audio.controls = true;
		audio.autoplay = true;
		audio.srcObject = stream;
		video.srcObject = stream;
		
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
	}
	micStarted = !micStarted;
}
<<<<<<< HEAD
function testMic(micID) {
	var constraintMic = {
		deviceId: { exact: micID },
	};
	startStream(startTestMic, constraintMic, false);
}

function startPeerStream(callback, data) {
	var micID = window.mic[0].id;
	if (window.cam[0] == null) {
		var constraintCam = false;
	} else {
		var constraintCam = {
			deviceId: { exact: window.cam[0].id },
			width: 400,
			height: 250
		}
	}

	var constraintMic = {
		deviceId: { exact: micID },
	};

	startStream(callback, constraintMic, constraintCam, data)
}

function startStream(callback, constraintMic, constraintCam, data) {
	if (window.stream) {
		callback("Ya tenia el stream!")
	} else {
		getusermedia(
			{
				video: constraintCam,
				audio: constraintMic
			},
			function (err, stream) {
				if (err) {
					console.log(err);
				} else {
					window.stream = stream;
					if (data) {
						callback(data)
					} else {
						callback()
					}
				}

			}
		);
	}
}
=======
	function startMedia() {	
	var constraintMic = {
		deviceId: {exact:window.mic[0].id},
	};	
	var constraintCam = {
		deviceId: {exact:window.cam[0].id},
	};	
	getusermedia(
		{
			//video: true,
			video: {constraintCam,
			width: 200,
			height: 150
			},
			audio: constraintMic
		},
		function (err, stream) {
			if (err) {
				console.log(err);
			} else {
				//We can create the object dinamycly if we need to
				// document.getElementById("video").appendChild(video);
				// audio.controls = true;
				// audio.autoplay = true;
				// audio.srcObject = stream;
				// video.srcObject = stream;
				// video.play();
				window.stream=stream;
			}
			
		}
	);
	return stream;
}
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
