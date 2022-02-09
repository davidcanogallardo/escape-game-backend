<<<<<<< HEAD
import Phaser from 'phaser';

export default createChestAnims({
    (anims) => {
        
    anims.create({
        key: 'chest-open',
        frames: anims.generateFrameNames('chest',{start: 0, end: 2, prefix: 'chest_empty_open_anim_f', suffix: '.png',}),
        frameRate: 5
    })

    anims.create({
        key: 'chest-closed',
        frames: ({key: 'chest', frame:'chest_empty_open_anim_f0.png'})
    })
})

=======
import Phaser from 'phaser';

export default createChestAnims({
    (anims) => {
        
    anims.create({
        key: 'chest-open',
        frames: anims.generateFrameNames('chest',{start: 0, end: 2, prefix: 'chest_empty_open_anim_f', suffix: '.png',}),
        frameRate: 5
    })

    anims.create({
        key: 'chest-closed',
        frames: ({key: 'chest', frame:'chest_empty_open_anim_f0.png'})
    })
})

>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
