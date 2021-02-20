<x-layout title="Hello, World">
    <main class="container mx-auto">
        <div class="mx-auto w-full px-6 leading-relaxed text-xl | lg:w-3/5 lg:px-0 dark:text-gray-100">
            <h1 class="text-3xl font-bold">I use...</h1>

            <p class="mb-4">
                This page details all the hard- and software I use on a day-to-day basis. Be sure to also take a look at
                <a href="https://uses.tech" class="link">uses.tech</a> for a list of other awesome <code>/uses</code>
                pages!
            </p>

            <x-note class="mb-4">
                Some links on this page are Amazon affiliate links, and I get a small kickback if you buy something
                through them.
            </x-note>

            <x-heading>Workplace</x-heading>

            <p class="mb-4">
                My daily driver at the moment is a 2019 MacBook Pro with an Intel Core i7 processor, 32 GB of RAM, and a
                512 GB SSD. This is attached to my <a class="link" href="https://amzn.to/3rsdIN7">CalDigit TS3+</a> via
                a single Thunderbolt 3 cable, which is hooked up to 2
                <a class="link" href="https://amzn.to/2MyiJFr">Dell Ultrasharp U2515H displays</a>.
            </p>

            <p class="mb-4">
                My peripherals of choice are:

                <ul class="list-disc pl-6 pb-4">
                    <li>The <a href="https://amzn.to/3cI7JQm" class="link">Logitech MX Master 2S</a> mouse</li>
                    <li><a class="link" href="https://amzn.to/3oXTvgu">Keychron K2 (Aluminium + RGB with Cherry MX Brown switches)</a></li>
                    <li>A pair of <a class="link" href="https://amzn.to/3cMOIfy">AudioTechnica M50x</a> headphones</li>
                    <li><a class="link" href="https://amzn.to/3aFbgfJ">Blue Snowball microphone</a></li>
                    <li><a href="https://amzn.to/2MG3HNM" class="link">Logitech C920</a> for my webcam-needs</li>
                </ul>
            </p>

            <p class="mb-4">
                I will also occasionally use my pair of <a href="https://amzn.to/3jpGD1z" class="link">AirPods Pro (2019)</a>
                if I'm feeling adventurous.
            </p>

            <p class="mb-4">
                I have the <a href="https://www.ikea.com/us/en/p/idasen-desk-sit-stand-black-dark-gray-s79280998/" class="link">IKEA IDÅSEN sit/standing desk</a>,
                and when I'm not standing at it, I sit on an <a href="https://www.ikea.com/us/en/p/markus-office-chair-vissle-dark-gray-90289172/" class="link">IKEA MARKUS office chair</a>.
            </p>

            <x-heading>Software</x-heading>

            <x-use title="Alfred" link="https://www.alfredapp.com">
                I use Alfred <i>all the time</i>. It is my app launcher & switcher, my clipboard history manager, my
                workflow launcher, and my snippet expander. It is incredibly versitile and well worth the cost of the
                power pack.
            </x-use>

            <x-use title="Code editor">
                My primary IDE is whatever <a href="https://www.jetbrains.com/products/#type=ide" class="link">Jetbrains IDE</a> 
                works best for the language I am developing in at the time. On PHP projects, this is PhpStorm. For Go, Goland. 
                If I'm writing Java, Intellij it is. For simple throwaway scratch files and quick editing (that does not require an IDE), 
                I use <a href="https://code.visualstudio.com" class="link">Microsoft VS Code</a>.
            </x-use>

            <x-use title="1Password" link="https://1password.com">
                1Password is by far the best password manager I have used to date. After years of having a cobbled together
                solution of Dropbox + KeePass + lots of frustration, I made the switch and have not looked back since.
            </x-use>

            <x-use title="Things" link="http://culturedcode.com/things/">
                Having used no proper todo app for the longest time, I finally decided to start using one after reading the
                book Getting Things Done. This has proven to be the best thing I could have done. And since I am already
                up to my waste into the Apple ecosystem, I figured I would pick up the best todo app available.
            </x-use>

            <x-heading>Daily Carry</x-heading>
        </div>
    </main>
</x-layout>
