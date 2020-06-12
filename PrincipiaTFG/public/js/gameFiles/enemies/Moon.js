class Moon extends Enemy {
    constructor(config) {
        super(config);

        this.lives = 8;
        this.canTouch = true;
        this.moveSet = config.movement;
        this.posX = config.x;
        this.player = config.player;

        //Animación        
        this.play("anim-moonOff");
        this.body.setSize(32, 32);
        this.setScale(2);

        this.loop1 = true;

        this.waitShoot();

    }

    moveShip() {
        if (this.y < 80) {
            this.body.velocity.y = 100;
        } else {
            this.body.velocity.y = 0;
            this.x = this.player.x;
        }
    }

    waitShoot() {
        this.play("anim-moonOff");

        this.scene.time.addEvent({
            delay: 1000,
            callback: () => {
                this.makeShoot();
            },
            callbackScope: this,
            repeat: 0
        });
    }

    makeShoot() {
        this.play("anim-moonOn");
        this.scene.time.addEvent({
            delay: 500,
            callback: () => {
                this.shoot(1);
                this.waitShoot()
            },
            callbackScope: this,
            repeat: 0
        });
    }

}