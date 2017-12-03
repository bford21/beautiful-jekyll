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

1. Owner of contract can get an account balance.
2. Owner of contract can set an account balance.


## Let's write some code

The first thing we need to do is tell the compiler which version of Solidity we want to compile against.

{% highlight python linenos %}
 pragma solidity ^0.4.0;
{% endhighlight %}

The next thing we need to do is create a new contract and define two variables, one to hold the balance and another for the address of the owner of the contract.

{% highlight html linenos %}
contract AccountBalance{
    uint balance;
    address owner;
}
{% endhighlight %}

Now this contract needs a constructor. A constructor is a function that is called only when the contract is first created. 

Our constructor will set the owner of the contract as well as the initial balance.

{% highlight javascript linenos %}
function AccountBalance(uint NewBalance) public{
    balance = NewBalance;
    owner = msg.sender;
}
{% endhighlight %}

Next we'll add what's called a modifier. 
A modifier can be used to change the body of a function.
This is where we will add the logic to check if the sender is equal to the owner.

{% highlight php linenos %}
modifier onlyOwner{
    require(msg.sender == owner);
    _;
}
{% endhighlight %}

Now we have to write two functions. One to return the balance and one to set the balance.

{% highlight javascript linenos %}
function GetBalance() public constant returns(uint){
    return balance;
}

function SetBalance(uint NewBalance) public returns (uint){
    balance = NewBalance;
    return balance;
}
{% endhighlight %}




