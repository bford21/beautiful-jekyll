---
layout: post
title: Ethereum Mining Rig Parts List
image: /img/etherLogo2.png
bigimg: /img/miner/complete.jpg
tags: [ethereum, ether, crypto, currency, cryptocurrency, mine, miner, mining, graphics cards, bitcoin]
comments: true
---

I've always found cryptocurrencies like Bitcoin, Ethereum and Litecoin extremely interesting. Especially the underlying technology called blockchain. 
Lately I've been trying my hand at cryptocurrency mining and today I thought I'd share with you a detailed parts list so you have all the knowledge you need to build your own miner. 

I built my first Ethereum mining rig a couple months ago and it was the first computer I had ever built myself. 
It was a lot of fun and I quickly became interested in the hardware side of computing apposed to the software side.
I made plenty of mistakes building my first mining rig so I wanted to document my parts list and hopefully pass on some knowledge to others out there interested in cryptocurrency mining.

### Graphics Cards
Which graphics cards you use is the most important and also most expensive part of a build. For my first mining rig I stuck with AMD Radeon RX580 graphics cards. 
AMD RX and R9 series cards are among the most popular due to the combination of price/hashrate/wattage. 
You need atleast 4gb of memory per card but the more the better. You will see slightly better hashrates on 8gb cards than 4gb ones. 

The hashrate on different cards is going to vary greatly so do your research before purchasing any cards. 
<a href="https://www.cryptocompare.com/">CryptoCompare</a> is a good resource for researching the hashrates/wattages for various cards. 
Cards that are efficient for mining are in extremely high demand at the moment so finding them might be difficult. <a href="http://www.nowinstock.net/">Nowinstock.net</a> is a great site for getting alerts when cards become available.

### CPU
No need for an expensive CPU. An intel Celeron or Pentium will do. Just make sure to note the socket type (1150 vs 1151) and check that your motherboard supports it.
For this build I bought an <a href="https://www.amazon.com/gp/product/B00EF1G9DW/ref=oh_aui_detailpage_o01_s00?ie=UTF8&psc=1" >Intel Pentium 1150</a>.
					
### Motherboard
You need a motherboard that supports your CPU's socket type, chipset, and has plenty of PCLe slots. I recommend a motherboard specifically made for crypto mining. 
I went with <a href="https://www.amazon.com/gp/product/B00EF1G9DW/ref=oh_aui_detailpage_o01_s00?ie=UTF8&psc=1">ASRock H81 Pro BTC</a> which supports a 1150 CPU socket type and has 6 PCLe slots.

### RAM
4Gb of RAM is sufficient although RAM is cheap and you could benefit from having 8Gb. Make sure your RAM type (DDR3, DDR4) is supported by your motherboard.

### SSD or HDD
You don't need much space for your drive. I was initially using an older repurposed laptop HDD but I decided to just bite the bullet and purchase a small 120gb SSD for increased speed.

### Power Supply (s)
In order to power everything I've chosen to go the 2 power supply route. 2 750Watt modular power supplies from EVGA have worked great powering my first rig.
You can get them on <a href="https://www.amazon.com/gp/product/B017HA3RGE/ref=oh_aui_detailpage_o06_s00?ie=UTF8&psc=1">Amazon</a>.

### Powered USB Risers
You want to buy powered usb risers with a 6-pin PCI-E to SATA power cable. They sell risers with molex to SATA power cables but it's best to avoid them. 
People have reported cables catching fire/melting due to heat. 
I recommend the follwing risers from <a href="https://www.amazon.com/gp/product/B06ZY2R85P/ref=crt_ewc_title_oth_2?ie=UTF8&psc=1&smid=A12GMIJD0C8L78">MintCell</a>.

### Optional
* <a href="https://www.amazon.com/gp/product/B00009MDBU/ref=oh_aui_detailpage_o04_s00?ie=UTF8&psc=1">Wattage Monitor</a>
* <a href="https://www.amazon.com/gp/product/B01LMZZFWO/ref=oh_aui_detailpage_o00_s00?ie=UTF8&psc=1">Power Button</a>

**Note:** Keyboard, mouse and monitor required for initial setup. You can then run your miner without them, using SSH to edit and make changes.

<!--
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

<div class="carousel-inner">
    <div class="item active">
      <img src="..\img\miner\complete.jpg" alt="All Parts">
    </div>
	<div class="item">
      <img src="..\img\miner\miner.jpg" alt="Assembled Miner">
    </div>
	<div class="item">
      <img src="..\img\miner\adrus.jpg" alt="AMD Radeon RX580 Graphics Card">
    </div>
	<div class="item">
      <img src="..\img\miner\cpu.jpg" alt="CPU">
    </div>
	<div class="item">
      <img src="..\img\miner\dual.jpg" alt="AMD Raeon RX580 Graphics Card">
    </div>
	<div class="item">
      <img src="..\img\miner\mobo.jpg" alt="Motherboard">
    </div>
	<div class="item">
      <img src="..\img\miner\msiGaming.jpg" alt="AMD Raeon RX580 Graphics Card">
    </div>
	<div class="item">
      <img src="..\img\miner\nitro.jpg" alt="AMD Raeon RX580 Graphics Card">
    </div>
	<div class="item">
      <img src="..\img\miner\ps.jpg" alt="Power Supplies">
    </div>
	<div class="item">
      <img src="..\img\miner\redDragon.jpg" alt="AMD Raeon RX580 Graphics Card">
    </div>
	<div class="item">
      <img src="..\img\miner\riser.jpg" alt="PCI-E Risers">
    </div>
	<div class="item">
      <img src="..\img\miner\strix.jpg" alt="AMD Raeon RX580 Graphics Card">
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-arrow-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-arrow-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
-->

<div class="container">
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="..\img\miner\riser.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="..\img\miner\riser.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="..\img\miner\riser.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
