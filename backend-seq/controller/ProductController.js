const {Product, Category, Image, Brand, ProductVariation } = require('../models');
const image = require('../models/image');
class ProductController {

    static async ProductSlider(req, res){
        try {
            const products = await Product.findAll({
                include: [
                    {
                      model: Image,
                      attributes:['image_name']
                    },
                  ],
                  attributes: ['product_name', 'slug', 'product_price'], 
            });
            res.status(200).json(products);
          } catch (error) {
            console.error(error);
          }
       
    }
    static async ProductDetail(req, res){
      try {
          const {slug} = req.params
          const product = await Product.findOne({ where: { slug }
              , include: [
                  {
                    model: Image,
                    attributes:['image_name']
                  },
                  { model: Brand,
                    attributes:['brands_name']
                  },
                  { model: Category,
                    attributes:['categories_name']
                  },
                  { model: ProductVariation,
                    attributes:['size', 'color']
                  }
                ],
                attributes: ['product_name', 'product_stock', 'product_price','product_description','product_weight']
          });
                
          res.status(200).json(product);
          
        } catch (error) {
          console.error(error);
        }
     
  } 
}


module.exports = ProductController