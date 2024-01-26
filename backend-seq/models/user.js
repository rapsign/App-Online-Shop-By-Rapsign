'use strict';
const { Model } = require('sequelize');

module.exports = (sequelize, DataTypes) => {
  class User extends Model {
    static associate(models) {
      // define association here
    }
  }

  User.init({
    uuid: {
      type: DataTypes.STRING,
      allowNull: false,
      unique: true,
      validate: {
        notNull: {
          msg: 'UUID is required.',
        },
      },
    },
    name: {
      type: DataTypes.STRING,
      allowNull: false,
      validate: {
        notEmpty: {
          args:true,
          msg: "Name is required",
        },
        notNull: {
          args:true,
          msg: 'Name is required.',
        },
      },
    },
    email: {
      type: DataTypes.STRING,
      allowNull: false,
      validate: {
        notEmpty: {
          msg: "Email is required",
        },
        notNull: {
          msg: 'Email is required.',
        },
        isEmail: {
          msg: 'Invalid email address.',
        },
      },
    },
    picture: DataTypes.TEXT,
    address: DataTypes.TEXT,
    phone_number: {
      type: DataTypes.INTEGER,
      validate: {
        isValidPhoneNumber(value) {
          if (!/^\d{10,15}$/.test(value)) {
            throw new Error('Invalid phone number format.');
          }
        },
      },
    },
  }, {
    sequelize,
    modelName: 'User',
  });

  return User;
};