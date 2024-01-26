const { User } = require('../models');
class UserController {

    static async Auth(req, res){
      try {
        const dataUser = req.body;
         
        // Find or create the user based on the provided UUID
        const [user, created] = await User.findOrCreate({
          where: { uuid: dataUser.sub,
                    
                   },
                   defaults: {
                    name: dataUser.given_name ? dataUser.name : dataUser.nickname,
                    email: dataUser.email,
                    picture:dataUser.picture
                   }
        }); 
           
        if (created) {
          res.status(201).json(user); // 201 for "Created" (if a new user was created)
        } else {
          res.status(200).json(user); // 200 for "OK" (if the user already existed)
        }
      } catch (error) {
        return null
      }
    }
    static async saveUserData(req, res) {
  try {
    const { id, name, address, phone_number } = req.body;
    const user = await User.findByPk(id) 
    await user.update({name, address, phone_number})
    res.status(201).json({ Success: 'Profile Updated' });
  } catch (error) {
    console.error('Error updating user data:', error);
    if(error.name === "SequelizeValidationError"){ 
      res.status(400).json({error : error.errors[0].message})
    }
    return res.status(500).json({ error: 'Internal Server Error' });
  }
}
}
module.exports = UserController