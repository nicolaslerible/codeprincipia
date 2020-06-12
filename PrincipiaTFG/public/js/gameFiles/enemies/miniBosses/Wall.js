class Wall extends Enemy {
    constructor(config) {
        super(config);

        this.lives = 6;
        this.canTouch = false;
        this.moveSet = config.movement;
        this.posX = config.x;
        this.odd = config.odd;

        //Animación        
        this.play("anim-wall");
        this.body.setSize(224, 32);
        this.setScale(2);

        this.loop1 = true;

        this.goDown();
        this.shootBalls();

    }

    moveShip() {
        if (this.lives == 0) {
            this.scene.endGame();
        }

    }

    goDown() {
        this.vel = 9;
        this.scene.time.addEvent({
            delay: 25,
            callback: () => {
                this.y += this.vel;
                this.vel--;
                if (this.vel == 0) {
                }
            },
            callbackScope: this,
            repeat: this.vel
        });
    }

    shootBalls() {
        this.scene.time.addEvent({
            delay: 2000,
            callback: () => {
                this.makeBall();
            },
            callbackScope: this,
            repeat: -1
        });
    }

    makeBall() {
        this.green = parseInt(Math.random() * 6);
        this.pos1 = 72;
        this.pos2 = 336;
        for (var i = 0; i < 3; i++) {
            if (this.green == i) {
                this.scene.enemy4 = new Ball({ scene: this.scene, x: this.pos1, y: 100, w: this.width, h: this.height, boss: this, color: "anim-ballGreen" });
            } else {
                this.scene.enemy4 = new Ball({ scene: this.scene, x: this.pos1, y: 100, w: this.width, h: this.height, boss: this, color: "anim-ballRed" });
            }
            this.pos1 += 52;
        }
        for (var i = 3; i < 6; i++) {
            if (this.green == i) {
                this.scene.enemy4 = new Ball({ scene: this.scene, x: this.pos2, y: 100, w: this.width, h: this.height, boss: this, color: "anim-ballGreen" });
            } else {
                this.scene.enemy4 = new Ball({ scene: this.scene, x: this.pos2, y: 100, w: this.width, h: this.height, boss: this, color: "anim-ballRed" });
            }
            this.pos2 += 52;
        }
    }

}