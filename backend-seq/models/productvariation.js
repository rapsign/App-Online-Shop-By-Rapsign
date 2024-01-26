'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class ProductVariation extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      ProductVariation.belongsTo(models.Product)
    }
  }
  ProductVariation.init({
    ProductId: DataTypes.INTEGER,
    size: DataTypes.TEXT,
    color: DataTypes.TEXT
  }, {
    sequelize,
    modelName: 'ProductVariation',
  });
  return ProductVariation;
};