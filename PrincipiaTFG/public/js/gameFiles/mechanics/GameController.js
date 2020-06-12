class GameController extends Phaser.Scene {
    constructor() {
        super({
            key: 'controller'
        });
    }

    create() {

        //Songs
        this.musMenu = this.sound.add("mus-menu"); //menu
        this.musLv1 = this.sound.add("mus-lv1");   //lvl1
        this.musLv2 = this.sound.add("mus-lv2");   //lvl2
        this.musLv3 = this.sound.add("mus-lv3");   //lvl3
        this.musLv4 = this.sound.add("mus-lv4");   //lvl4
        this.musVictory = this.sound.add("mus-victory");   //victory

        //Music Configuration
        this.musicConfig = {
            mute: false,
            volume: 0.5,
            rate: 1,
            detune: 0,
            seek: 0,
            loop: true,
            delay: 0
        }

        //// EVENTS ////
        //play
        this.registry.events.on("playMenu", () => {
            this.playMenu();
        });
        //change
        this.registry.events.on("changeSong", (play, stop) => {
            if (stop != null) {
                this.stopSong(stop);
            }
            this.playSong(play);
        });


    }

    playMenu() {
        this.musMenu.play(this.musicConfig);
    }

    playSong(song) {
        switch (song) {
            case "menu":
                this.musMenu.play(this.musicConfig);
                break;
            case "lvl1":
                this.musLv1.play(this.musicConfig);
                break;
            case "lvl2":
                this.musLv2.play(this.musicConfig);
                break;
            case "lvl3":
                this.musLv3.play(this.musicConfig);
                break;
            case "lvl4":
                this.musLv4.play(this.musicConfig);
                break;
            case "victory":
                this.musVictory.play(this.musicConfig);
                break;
        }
    }
    stopSong(song) {
        switch (song) {
            case "menu":
                this.musMenu.stop();
                break;
            case "lvl1":
                this.musLv1.stop();
                break;
            case "lvl2":
                this.musLv2.stop();
                break;
            case "lvl3":
                this.musLv3.stop();
                break;
            case "lvl4":
                this.musLv4.stop();
                break;
            case "victory":
                this.musVictory.stop();
                break;
        }
    }
}