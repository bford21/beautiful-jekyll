---
layout: post
title: How to use Coinhive to mine Monero
image: /img/coinhive.png
bigimg: /img/moneroText.png
tags: [monero, XMR, crypto, currency, cryptocurrency, mine, miner, mining, graphics cards, bitcoin]
comments: true
---

In my last post I talked about discoving services that allow you to embed Monero javascript miners into web pages.
Today I'd like to talk about one specifically and walk you through how to embed the miner on your own page.

The service we'll be using is <a href="https://coinhive.com">CoinHive.com</a>.
CoinHive is the company that actually wrote the mining software, we'll simply be embedding it in our page.
The first thing you'll want to do is head to their site and create an account.

## Lets get started

After you've created an account add the following library inside the head of your html document.

{% highlight html linenos %}
 <script src="https://coin-hive.com/lib/coinhive.min.js"></script>
{% endhighlight %}

When the page loads this script will load the miner so we can use it.

The next step is to start mining.
To do so add the following bit of code somewhere inside the body of the page.

{% highlight html linenos %}
<script>
var miner = new CoinHive.Anonymous('INSERT YOUR OWN SITE KEY');
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
</script>
{% endhighlight %}

On line 2 make sure to insert your own site key.
This key can be found under "Settings > Sites & API Keys" within CoinHive. 
This key links the work done by the miner to your account so you get credited.

Lines 16, 17 & 18 print your Hashes Per Second, Total Hashes and Accepted Hashes to an HTML element with the respective names.
Lets go ahead and create those elements so you can visually see your miners live statistics.

{% highlight html linenos %}
<table>
	<tr>
		<td>Hashes Per Second</td>
		<td id="hashesPerSecond"></td>
	</tr>
	<tr>
		<td>Accepted Hashes</td>
		<td id="acceptedHashes"></td>
	</tr>
	<tr>
		<td>Total Hashes</td>
		<td id="totalHashes"></td>
	</tr>
</table>
{% endhighlight %}

This will create a simple table so you can see some statistics about your miner.

If you refresh your page you should see the table being populated with your hashrate, total and accepted hashes. 
If you look at your CoinHive dashboard you should also see some activity.
Congrats you've just successfully embeded a Javascript Monero miner into your page!

I reccommend reading CoinHive's <a href="https://coinhive.com/documentation">documentation</a> if you want to learn more about configuring your miner.
