class Button extends Phaser.GameObjects.Sprite {
    constructor(config) {
        super(config.scene, config.x, config.y);

        //PARAMS//
        //Scene
        this.scene = config.scene;
        this.on = config.on;
        this.off = config.off;
        this.dir = config.flip;

        //Animación        
        this.play(this.off);

        //Configuración
        this.scene.physics.world.enable(this);
        this.scene.add.existing(this);
        this.setInteractive();

        if(this.dir){
            this.flipX = true;
        }

        this.setScale(2);
    }

    animateButton(){
        this.play(this.on);
    }

    desactivateButton(){
        this.play(this.off);
    }

}