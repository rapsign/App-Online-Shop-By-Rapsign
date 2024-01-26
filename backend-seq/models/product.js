'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Product extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      Product.belongsTo(models.Category)
      Product.belongsTo(models.Brand)
      Product.hasMany(models.Image)
      Product.hasMany(models.ProductVariation)
    }
  }
  Product.init({
    product_name: DataTypes.STRING,
    slug: DataTypes.TEXT,
    product_price: DataTypes.INTEGER,
    product_stock: DataTypes.INTEGER,
    product_description: DataTypes.TEXT,
    product_weight: DataTypes.INTEGER,
    CategoryId: DataTypes.INTEGER,
    BrandId: DataTypes.INTEGER
  }, {
    sequelize,
    modelName: 'Product',
  });
  return Product;
};