class Shoot extends Enemy {
    constructor(config) {
        super(config);

        this.canTouch = false;
        this.moveSet = config.movement;
        this.posX = config.x;
        this.velx = config.velx;
        this.vely = config.vely;

        //Animación        
        this.play("beam_anim");
        this.body.setSize(8, 8);
        this.setScale(2);
        this.setTint('0xff9900');

        this.goDown();
    }

    goDown() {
        this.rep = 300;
        this.scene.time.addEvent({
            delay: 1,
            callback: () => {
                this.y += this.vely;
                this.x += this.velx;
                this.rep--;
                if (this.rep == 0) {
                    this.destroy();
                }
            },
            callbackScope: this,
            repeat: this.rep
        });
    }

    moveShip() {

    }
}