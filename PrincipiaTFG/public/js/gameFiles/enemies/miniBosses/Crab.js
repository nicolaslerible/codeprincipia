class Crab extends Enemy {
    constructor(config) {
        super(config);

        this.lives = 20;
        this.canTouch = true;
        this.moveSet = config.movement;
        this.posX = config.x;
        this.player = config.player;

        this.chase = true;
        this.count = 8;

        //Animación        
        this.play("anim-crab");
        this.body.setSize(54, 49);
        this.setScale(2);

        this.loop1 = true;

        this.goDown();

    }

    moveShip() {
        if (this.chase) {
            this.chasePlayer();
        }

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
                    this.chasePlayer();
                    this.tripleShoot(2);

                }
            },
            callbackScope: this,
            repeat: this.vel
        });

    }

    chasePlayer() {
        if (this.x > this.player.x) {
            this.body.velocity.x = -20;
        } else if (this.x < this.player.x) {
            this.body.velocity.x = 20;
        }
    }

    waitShoot() {

        this.scene.time.addEvent({
            delay: 600,
            callback: () => {
                this.count--;
                if(this.count % 2 == 0){
                    this.tripleShoot(2);
                }else {
                    this.dobleShoot(2);
                }

                if (this.count == 0) {
                    this.count = 8;
                    this.makeParabola(16, 1);
                }
            },
            callbackScope: this,
            repeat: 0
        });
    }
    tripleShoot(num) {
        this.cont = num;
        this.scene.time.addEvent({
            delay: 300,
            callback: () => {
                this.cont--;
                this.scene.beamSound.play();
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x - 16, y: this.y, w: this.width, h: this.height, velx: -1, vely: 4.7 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x - 8, y: this.y, w: this.width, h: this.height, velx: -0.6, vely: 4.9 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x, y: this.y, w: this.width, h: this.height, velx: 0, vely: 5 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x + 8, y: this.y, w: this.width, h: this.height, velx: 0.6, vely: 4.9 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x + 16, y: this.y, w: this.width, h: this.height, velx: 1, vely: 4.7 });
                if (this.cont == 0) {
                    this.waitShoot()
                }
            },
            callbackScope: this,
            repeat: num
        });
    }
    dobleShoot(num) {
        this.cont = num;
        this.scene.time.addEvent({
            delay: 300,
            callback: () => {
                this.cont--;
                this.scene.beamSound.play();
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x - 24, y: this.y, w: this.width, h: this.height, velx: -1.5, vely: 4.5 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x - 16, y: this.y, w: this.width, h: this.height, velx: -1.3, vely: 4.6 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x - 8, y: this.y, w: this.width, h: this.height, velx: -1, vely: 4.7 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x + 8, y: this.y, w: this.width, h: this.height, velx: 1, vely: 4.7 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x + 16, y: this.y, w: this.width, h: this.height, velx: 1.3, vely: 4.6 });
                this.scene.shoot = new Shoot({ scene: this.scene, x: this.x + 24, y: this.y, w: this.width, h: this.height, velx: 1.5, vely: 4.5 });
                if (this.cont == 0) {
                    this.waitShoot()
                }
            },
            callbackScope: this,
            repeat: num
        });
    }

    makeParabola(pos, dir) {
        this.scene.time.addEvent({
            delay: 200,
            callback: () => {
                this.scene.enemy1 = new Basic({ scene: this.scene, x: pos, y: 16, movement: 5, w: this.width, h: this.height, loop: 1, direction: dir });
            },
            callbackScope: this,
            repeat: 5
        });
    }

}