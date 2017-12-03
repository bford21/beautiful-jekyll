---
layout: post
title: Programming Ethereum smart contracts
subtitle: Using Solidity
image: /img/smartcontracts.jpg
share-img: http://brianford.tech/img/smartcontracts.jpg
tags: [ethereum, smart contracts, solodity, programming, tutorial, get started, bitcoin]
comments: true
---

This post will walk you through creating a basic Ethereum smart contract using Solidity.
Solidity is a contract-oriented programming language influenced by C++, Python and Javascript.
It is a statically typed language that supports many programming features that are found in other languages such as inheritance, libraries and user-defined types.

## Where to begin

To begin programming in Solidity you need an IDE (Integrated development environment) that supports it.
For rapid development and testing I recommend <a href="https://remix.ethereum.org">Remix</a>. 
Remix is an in browser IDE made by the Ethereum team and is perfect for getting started quickly and easily. 

Today the smart contract we will be writing will be very simple and allow you to do two things.

1. Get an account balance.
2. Set an account balance.

## Let's Write Some Code

The first thing we need to do is tell the compiler which version of Solidity we want to compile against.

{% highlight python linenos %}
 pragma solidity ^0.4.0;
{% endhighlight %}


