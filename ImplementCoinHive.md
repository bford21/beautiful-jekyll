---
layout: post
title: How to use Coinhive to mine Monero
image: /img/coinhive.png
tags: [monero, XMR, crypto, currency, cryptocurrency, mine, miner, mining, graphics cards, bitcoin]
comments: true
---

In my last post I talked about discoving services that allow you to embed Monero javascript miners into web pages.
Today I'd like to talk about one specifically and walk you through how to embed the miner on your own page.

The service we'll be using is <a href="https://coinhive.com">CoinHive.com</a>.
CoinHive is the company that actually wrote the mining software, we'll simply be embedding it in our page.
The first thing you'll want to do is head to their site and create an account.

### Lets get started

After you've created an account add the following library inside the ~~~head~~~ of your html document.

{% highlight html linenos %}
 <script src="https://coin-hive.com/lib/coinhive.min.js"></script>
{% endhighlight %}



