class Basic extends Enemy {
    constructor(config) {
        super(config);

        this.lives = 0;
        this.canTouch = true;
        this.moveSet = config.movement;
        this.odd = config.odd;
        this.dir = config.direction;

        //Animación        
        this.play("anim-galaxy");
        this.body.setSize(16, 16);
        this.setScale(2);



    }

    moveShip() {
        switch (this.moveSet) {
            case 1:
                this.moveSet1();
                break;
            case 2:
                this.moveSet2();
                break;
            case 3:
                this.moveSet3();
                break;
            case 4:
                this.moveSet4();
                break;
            case 5:
                this.moveSet5(this.dir);
                break;
            case 6:
                this.moveSet6();
                break;
        }
    }

    moveSet1() {
        if (this.x > 800 * 2) {
            this.resetShipPos(0, 0);
        }

        if (this.x < (this.totalX / 3)) {
            this.body.velocity.y = 150 * 2;
            this.body.velocity.x = 150 * 2;
        } else if (this.x > ((2 * this.totalX) / 3)) {
            this.body.velocity.y = -150 * 2;
            this.body.velocity.x = 150 * 2;
        } else {
            this.body.velocity.y = 0;
            this.body.velocity.x = 190 * 2;
        }
    }

    moveSet2() {
        if (this.x < -200 * 2 || this.x > 456 * 2) {
            this.resetShipPos(128 * 2, 0);
        }

        if (this.y < 150 * 2) {
            this.body.velocity.x = 0;
            this.body.velocity.y = 190 * 2;
        } else {
            if (this.odd % 2 == 0) {
                this.body.velocity.y = 0;
                this.body.velocity.x = 150 * 2;
            } else {
                this.body.velocity.y = 0;
                this.body.velocity.x = -150 * 2;
            }
        }
    }

    moveSet3() {
        if (this.x < -200 * 2 || this.x > 456 * 2) {
            this.destroy();
        }
        this.body.velocity.x = 400;
        if (this.x > 480 && this.y < 480) {
            this.body.velocity.y = 400;
            this.body.velocity.x = 0;

        } else if (this.y > 480) {
            this.body.velocity.y = 0;
            this.body.velocity.x = -400;
        }

    }
    moveSet4() {
        if (this.x < -200 * 2 || this.x > 456 * 2) {
            this.destroy();
        }
        this.body.velocity.x = -400;
        if (this.x < 30 && this.y < 390) {
            this.body.velocity.y = 400;
            this.body.velocity.x = 0;

        } else if (this.y > 390) {
            this.body.velocity.y = 0;
            this.body.velocity.x = 400;
        }


    }
    moveSet5(dir) {
        if (dir > 0) {
            this.body.velocity.x = 300;
            if (this.x > 600) {
                this.resetShipPos(16, 16);
            }
        } else {
            this.body.velocity.x = -300;
            if (this.x < -88) {
                this.resetShipPos(496, 16);
            }
        }

        this.y = (-((this.x * this.x) * 3) / 512) + 3 * this.x;
    }
    moveSet6() {
        if (this.x > 1280) {
            this.dir = -1;
            this.resetShipPos(512, this.y + 64);
        } else if (this.x < -768) {
            this.dir = 1;
            this.resetShipPos(0, this.y + 64);
        }
        this.body.velocity.x = 512 * this.dir;


    }

}