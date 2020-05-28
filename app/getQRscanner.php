﻿<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<style>
	* {
		margin: 0;
	    padding: 0;
	}
    .preview-container, #preview {
        width: 100vw;
        height: 100vh;
		transform: scaleX(1)!important;
    }
	.scans {
		position: fixed;
		z-index: 99999999;
		height: 100px;
		width: 100vw;
		top: 0;
		left: 0;
		text-align: center;
		background: green;
		color: white;
		font-size: 2em;
    }
    li {
        list-style-type: none;
    }
</style>
<div id="app">
    <section class="scans">
        <ul v-if="scans.length === 0">
            <li class="empty">Сканирование</li>
        </ul>
        <transition-group name="scans" tag="ul">
            <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
        </transition-group>
    </section>
    <div class="preview-container">
        <video id="preview"></video>
    </div>
</div>
<script type="text/javascript" src="public/js/qrScan.js"></script>