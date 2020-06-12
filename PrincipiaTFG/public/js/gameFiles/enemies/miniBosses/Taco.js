class Taco extends Enemy {
    constructor(config) {
        super(config);

        this.lives = 10;
        this.canTouch = true;
        this.moveSet = config.movement;
        this.posX = config.x;
        this.odd = config.odd;

        //Animación        
        this.play("anim-taco");
        this.body.setSize(32, 24);
        this.setScale(2);

        this.loop1 = true;

        this.goDown();

    }

    moveShip() {
        if (this.lives == 0) {
            this.scene.endGame();
        }

    }

    goDown() {
        this.vel = 15;
        this.scene.time.addEvent({
            delay: 25,
            callback: () => {
                this.y += this.vel;
                this.vel--;
                if (this.vel == 0) {
                    this.moveX(40, -1);
                }
            },
            callbackScope: this,
            repeat: this.vel
        });

    }

    moveX(rep, dir) {
        this.scene.time.addEvent({
            delay: 1,
            callback: () => {
                this.x += 5 * dir;
                rep--;
                if (rep == 0) {
                    this.moveX(80, -dir);
                    this.makeEnemies(dir);
                    this.shoot(2);
                }
            },
            callbackScope: this,
            repeat: rep
        });
    }

    makeEnemies(dir) {
        if(dir > 0){
            var direction = 3;
            var posStart = 16;
        } else {
            var direction = 4;
            var posStart = 500;
        }
        this.scene.time.addEvent({
            delay: 50,
            callback: () => {
                this.scene.enemy1 = new Basic({ scene: this.scene, x: posStart, y: 80, movement: direction, w: this.width, h: this.height, loop: 0 });
            },
            callbackScope: this,
            repeat: 0
        });
    }

}