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

1. Anyone can get the account balance.
2. Owner of contract can set the account balance.


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

function SetBalance(uint NewBalance) onlyOwner public{
    balance = NewBalance;
}
{% endhighlight %}

These are both public function and can both be seen by the user.
However the "SetBalance" function can only be accessed by the owner because we've added the onlyOwner modifier. 

## All together
<p></p>
{% highlight javascript linenos %}
pragma solidity ^0.4.0;

contract AccountBalance{
    uint balance;
    address owner;
    
    function AccountBalance(uint NewBalance) public{
        balance = NewBalance;
        owner = msg.sender;
    }
    
    modifier onlyOwner{
        require(msg.sender == owner);
        _;
    }
    
    function GetBalance() public constant returns(uint){
        return balance;
    }
    
    function SetBalance(uint NewBalance) onlyOwner public{
        balance = NewBalance;
    }
}
{% endhighlight %}
<p></p>
## Compile and create

Now it's time to compile our code. If your using Remix, click on the compile menu on the right hand side.
Check the box that says "Auto compile".

Once your code is compiled it's time to create the contract!

<img src="/img/remixUI.PNG" alt="Remix compiler menu" />

In Remix, from the run tab and in the first dropdown menu select "Javascript VM".
This tells Remix to target the Javascript VM running on the page in the browser as the environment. 
This means that you are not actually deploying this contract on a blockchain.
This Javascript VM is simply a sandbox and will not be saved if you refresh the page.

Change the address to an address you'd like to be the owner of the contract, and you can leave "Gas limit", "Gas Price" and "Value" to the defaults.

In the box below, select your newly created contract in the drop down.
You can leave the "At Address" blank and then in the "Create" box input the initial balance.

When you are ready click "Create" and your newly created contract will appear below. 

<img src="/img/deployedContract.PNG" alt="Newly created smart contract" />

Notice the value returned by "GetBalance" is the value we set when we created it.

Play around with setting and getting new balance values. 
Also change the account from the drop down and try to set the balance.

If you've followed me this far congrats you've just succesfully wrote and tested your very own smart contract!

