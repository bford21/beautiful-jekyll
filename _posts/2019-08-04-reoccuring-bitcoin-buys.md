---
layout: post
title: Automate buying Bitcoin and save 3.85%
subtitle: 
image: /img/btc.png
share-img: http://brianford.tech/img/btc.png
tags: [bitcoin, buy, coinbase, api, save, reoccurring]
comments: true
---

As a Software Engineer I'm constantly thinking about efficiency. What's the time complexity of this algorithm, can this be parallelized, where is the bottleneck?
So when I setup reoccurring Bitcoin buys on Coinbase it bothered me quite a bit that they took a 4% fee and my newly purchased Bitcoin wasn't available for withdrawal for 3-5 business days.

Github repo: <https://github.com/bford21/coinbase-api-scripts>

## Problem
Coinbase reoccurring buys incur a 4% fee. This compounded over time can be a significant amount of BTC. Your funds are also not available for withdrawal for 3-5 business days.

## Solution
Use the Coinbase API to place limit orders that only incur a 0.15% fee. Leverage your OS task scheduler to run the script at a specified interval.

## Tradeoffs
1. Your Coinbase Pro account must be preloaded with enough USD to place the trades
2. Greater chance of trades not going through

<br />

## Setup

### Prerequisite
- Create a Coinbase Pro account and generate an api key
- Link a bank account and deposit USD into coinbase
- Python `version 2.7`
- pip installed

### Clone repo

`git clone https://github.com/bford21/coinbase-api-scripts.git`

### Install requirements

`pip install -r requirements.txt`

### Create environment variables

- Create 3 different environment variables with the following names and values

`CB_API_KEY` = `<Your Coinbase API Key>`

`CB_SECRET_KEY` = `<Your Secret Key>`

`CB_PASSPHRASE` = `<Your Passphrase>`

**Alternatively you can set these in your config.yml**

### Setup config.yml

`config.yml` is located in the root directory and can be used to set the amount of btc to buy as well as your Coinbase Pro credentials

```
dollar_amount_to_buy: 50.0
CB_API_KEY:
CB_SECRET_KEY:
CB_PASSPHRASE:
```

<br />

## Run

### Windows

Use the native Windows task scheduler. Create a bsic task and point it at `run.bat`. Set it to run at the interval of your choosing. 

### Mac OS/Linux

On Mac OS & Linux leverage crontab to run `run.sh` at your specified interval. (<https://en.wikipedia.org/wiki/Cron>)

<br />

## How it works

The first thing the script checks for are the current fee rates for placing both limit and market order via the Coinbase Pro API. 
Placing a limit order is almost always cheaper so a limit order will be constructed based on the dollar amount specified in your `config.yml`
Limit orders require a minimum BTC size of 0.002 so if your order is below this value a market order will be placed and will incur a slightly higher fee.

<br />

## Future features

1. Multi coin support
<br />
