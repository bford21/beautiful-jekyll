 ---
layout: post
title: The Clean Coder
subtitle: My thoughts on the book by Robert Martin
image: /img/cleancode.jpg
share-img: http://brianford.tech/img/cleancode.jpg
tags: [clean coder, clean, coder, professional, programming, guide, book, review, robert, martin]
comments: true
---

Wow, it's been over a year since I posted a new blog. Where's the time gone?

I recently started a new position as a Software Engineer at a startup in Boston. On my first day I walked into the team room and saw my desk setup nice and neat. Front and center was a book titled "The Clean Coder - A Code of Conduct for Professional Programmers".

This book challenged how I thought about my job as a professional programmer and I had quite a few "ah-ha" moments. Here are a few of my key takeaways. 

## The Boy Scout Rule

Whether you are fixing a bug or implementing a new feature there are many instances where you find yourself in a section of code that simply doesn't make sense. The code is not commented, doesn't utilize object oriented principles and is just a mess of spaghetti. If your a software engineer you know what I'm talking about. 

It's very easy for a developer to look at this code and say "I'm not touching that mess besides it works doesn't it?". I'm brave enough to admit that I've done this plenty of times early in my career. 

The Boy Scout Rule says that you must always leave a place cleaner than you found it. This applies to programming as well. A true professional takes the time to make sure the spaghetti code they discovered is more understandable for the next person who comes along. 

## Practice

What if a Football player only picked up a football when it was game time? What if the only time a Doctor picked up a scalpel was when he was about to perform surgery? What if the only time a Software Engineer wrote code was while implementing a new feature for your product?

You see where I'm going with this? 

It makes no sense for a programmer to only write code while at work. A programmer must practice their craft just like any other craftsman.

## TDD

TDD stands for Test Driven Development. It is the development methodology that says you write the test first and then implement the feature to satisfy the test.

As my career progresses I'm really starting to understand the power and importance of automated tests. It doesn't matter how experienced somebody is, everybody makes mistakes and writes code with bugs. If even the most seasoned of vets can't be trusted to write bug free code then how do you release code with confidence? 

The answer is automated tests!! 

## Estimate vs Commitment

Before reading this book the difference between an estimate and a commitment was not very clear. I had always thought they were the same thing.

During sprint planning you assign estimates to stories and then you commit to the work you've just estimated by pulling the stories you believe you can get done into the sprint. Commitments and estimates must be the same thing right?

Wrong, Robert Martin makes the distinction between an estimate and a commitment as follows.

An commitment is something you must achieve. If you commit to having something done by a certain date, you have no other option but to get it done by that date.

An estimate on the other hand is a guess. No promise is implied and missing an estimate is not dishonorable. He goes on to say that estimating work is one of the hardest things we as developers do and that most people are terrible estimators. 

Why is estimating so hard?

Estimating is hard because most people don't understand an estimation is a distribution rather than a number. For every piece of work there is a best case, average case and worst case scenario for time of completion. Your estimate should be a probability distribution of these three cases. 

## Conclusion

In conclusion this book gave me a lot to think about and a few key takeaways to bring into my day to day dev life. For someone early on in their software development career I would absolutely recommend reading.

I enjoyed it so much I've added another book by Robert C Martin to my list called "Clean Code - A Handbook of Agile Software Craftsmanship". 

<a href="https://www.amazon.com/Clean-Coder-Conduct-Professional-Programmers/dp/0137081073/ref=pd_bxgy_14_img_3?_encoding=UTF8&pd_rd_i=0137081073&pd_rd_r=10ddc8b3-f1f2-11e8-b188-2fb63616cf11&pd_rd_w=C4pGo&pd_rd_wg=DVw3i&pf_rd_i=desktop-dp-sims&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=6725dbd6-9917-451d-beba-16af7874e407&pf_rd_r=JCPJ17ARGH3MCZE36K93&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&psc=1&refRID=JCPJ17ARGH3MCZE36K93">The Clean Coder on Amazon</a>

<a href="https://www.amazon.com/Clean-Code-Handbook-Software-Craftsmanship/dp/0132350882/ref=pd_bxgy_14_img_2?_encoding=UTF8&pd_rd_i=0132350882&pd_rd_r=0b844ea4-f1f2-11e8-bcb8-c5b226b16295&pd_rd_w=EAZbJ&pd_rd_wg=T57S5&pf_rd_i=desktop-dp-sims&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=6725dbd6-9917-451d-beba-16af7874e407&pf_rd_r=Q90JBJ4JQ5M0M3NRYWMG&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&psc=1&refRID=Q90JBJ4JQ5M0M3NRYWMG">Clean Code on Amazon</a>