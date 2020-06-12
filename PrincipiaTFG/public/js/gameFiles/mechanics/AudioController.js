class AudioController extends Phaser.Scene {
    constructor() {
        super({
            key: 'audio'
        });
    }

    create() {
        this.beamSound = this.sound.add("audio_beam");
    }

    makeSound(){
        this.beamSound.play();
    }
}