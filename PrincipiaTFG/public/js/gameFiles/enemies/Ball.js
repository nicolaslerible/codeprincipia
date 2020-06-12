class Ball extends Enemy {
    constructor(config) {
        super(config);

        this.moveSet = config.movement;
        this.posX = config.x;
        this.vely = 2;
        this.color = config.color;
        this.boss = config.boss;
        if (this.color == 'anim-ballRed') {
            this.canTouch = false;
        } else {
            this.canTouch = true;
        }

        //Animación        
        this.play(this.color);
        this.body.setSize(10, 10);
        this.setScale(2);

        this.goDown();
    }

    goDown() {
        this.body.velocity.y = 100;
    }

    moveUp() {
        this.body.velocity.y = -200;
    }

    moveShip() {
        if (this.y < 64) {
            this.y = 800;
            this.destroy();
            this.boss.lives--;
        } else if (this.y > 600){
            this.destroy
        }

    }
}